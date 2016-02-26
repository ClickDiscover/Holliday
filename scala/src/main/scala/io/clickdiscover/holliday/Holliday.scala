package io.clickdiscover.holliday

import akka.actor._
import akka.http.scaladsl.Http
import akka.http.scaladsl.server.Directives._
import akka.stream.ActorMaterializer
import com.typesafe.config.ConfigFactory
import java.util.UUID



case class Color(red: Int, green: Int, blue: Int) {
  override def toString() = s"RGB[$red, $green, $blue]"
}


trait Runnable {
  def run(): Unit
}

trait Holliday extends Runnable {

  def run(): Unit = {
    val config = ConfigFactory.load()
    val httpConfig = config.getConfig("http")
    val databaseConfig = config.getConfig("database")

    implicit val system = ActorSystem("holliday")
    implicit val materializer = ActorMaterializer()
    implicit val ec = system.dispatcher


    val route =
      path("hello") {
        parameterMap { map =>
          println(s"Recieved ${map.toString}")

          complete {
            "Hello"
          }
        }
      }


    val colors =
      path("color") {
        parameters('red.as[Int], 'green.as[Int], 'blue.as[Int]).as(Color) { color => 
          val res = s"Recieved ${color}"
          println(res)

          complete {
            res
          }
        }
      }

    val products = path("product") {
      parameters('id.as[String]) { id =>
        val uuid = java.util.UUID.fromString(id)

        val res = InMemoryProductService.find(uuid) match {
          case Some(product) => s"Found: ${product.toString}"
          case None => s"Nothing found for $id"
        }
        complete (res)
      }
    }


    val bindingFuture = Http().bindAndHandle(route ~ products, "localhost", 8080)
    println(s"Server online at http://localhost:8080/\nPress RETURN to stop...")
    Console.readLine() // for the future transformations
    bindingFuture
      .flatMap(_.unbind()) // trigger unbinding from the port
      .onComplete(_ ⇒ system.shutdown()) // and shutdown when done
  }
}


trait DoobieApp extends Runnable {
  def run(): Unit = {

    val products = InMemoryProductService.all
    products foreach println
  }
}


trait Runner { self: Runnable =>
  def main(args: Array[String]): Unit = run()
}

object Main extends Runner with Holliday 
