package io.clickdiscover.holliday

import java.util.UUID


trait ProductService {
  def find(id: UUID): Option[Product]
  def all: Seq[Product]
}

case class Slot(
  id: UUID,
  status: String,
  creative: String
)

trait SlotService {
  def find(id: UUID): Option[Slot]
  def all(id: UUID): Seq[Slot]
}


case class Article(
  id: UUID,
  title: String,
  templatePath: String,
  slots: Seq[Slot]
)

case class Offer (id: UUID)

case class Creative (id: UUID, headline: String)

trait ArticleService {
  def find(id: UUID): Option[Slot]
  def all(id: UUID): Seq[Slot]

  def bestOffers(article: Article): Seq[Offer]
  def bestCreatives(article: Article): Seq[Creative]
}

object InMemoryProductService extends ProductService {
  val ids = Seq(
    "4f401821-fb8b-3405-9cbe-e9c5b6dd2d7b",
    "ea5f58fe-a05b-3cf5-b2d9-f69c66078391",
    "9358c28c-8c19-333f-8dc2-a690def09f27",
    "8406baa9-4e40-337e-852c-8533b7b8a5fa",
    "d808664a-f151-3286-bb81-9a5dfcec5783",
    "812be78f-9755-3487-ba09-8ed173a5e1af",
    "ffca3701-03b2-3485-87d9-262cfa2c64b6",
    "5425bf96-dd71-38c7-b0d5-a12aceae80b8",
    "6d75d4d4-7e68-3647-8eb5-a6e09222b752",
    "c54ad27e-cb7b-3a3b-82eb-2dca42984155",
    "f011f213-c9ed-365a-8ee4-dd141447c4bb"
  ).map(UUID.fromString)

  val names = Seq(
    "Skin Creame",
    "Garcinia Cambogia",
    "Fat Remover"
  )

  val map = ids.zip(names).map { case (id: UUID, name: String) =>
    id -> Product(id, name, "")
  }.toMap

  def find(id: UUID) = map.get(id)
  def all = map.values.toList
}


object DatabaseProductService extends  ProductService {
  import slick.driver.PostgresDriver.api._

  val db = Database.forConfig("database")

  def find (id: UUID): Option[Product] = None

  def all = {
    val f = db.run(ProductTable.query.result)
    println(f)
    f.value.get.get
  }
}


// object DatabaseProductService {
  // import io.getquill._
  // import io.getquill.naming.SnakeCase
  // import io.getquill.sources.sql.idiom.PostgresDialect

  // implicit val decodeCustomValue = mappedEncoding[UUID, String](_.toString)
  // implicit val encodeCustomValue = mappedEncoding[String, UUID](UUID.fromString(_))

  // val db = source(new JdbcSourceConfig[PostgresDialect, SnakeCase]("db"))
  // val mirror = source(new SqlMirrorSourceConfig("db"))

  // val productQuote = quote {
    // query[Product]("products",
      // _.image -> "image_href")
  // }
// }

// import doobie.imports._
// import doobie.contrib.postgresql.pgtypes.UuidType

// object DatabaseProductService extends  ProductService {

  // val tx = Database.tx

  // def find (id: UUID) =
    // sql"SELECT uuid as id, name, image_href as image FROM products WHERE uuid = $id"
      // .query[Product]
      // .option
      // .transact(tx)
      // .run

  // def all =
    // sql"SELECT uuid as id, name, image_href as image FROM products"
      // .query[Product]
      // .list
      // .transact(tx)
      // .run

// }
