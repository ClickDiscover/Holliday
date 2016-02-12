package io.clickdiscover.holliday

import akka.actor._
import akka.http.scaladsl.Http
import akka.http.scaladsl.server.Directives._
import akka.stream.ActorMaterializer

case class Color(red: Int, green: Int, blue: Int)


object Holliday extends App {
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

  val foo = 'afbs
  val bindingFuture = Http().bindAndHandle(route ~ colors, "localhost", 8080)

  println(s"Server online at http://localhost:8080/\nPress RETURN to stop...")
  Console.readLine() // for the future transformations
  bindingFuture
    .flatMap(_.unbind()) // trigger unbinding from the port
    .onComplete(_ ⇒ system.shutdown()) // and shutdown when done
}

