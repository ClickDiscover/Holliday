package io.clickdiscover.holliday

import java.util.UUID

// import slick.driver.PostgresDriver.api._


case class ProductId(id: UUID)
case class Product(id: ProductId, name: String, image: String)


// class ProductTable(tag: Tag) extends Table[Product](tag, "products") {
  // def id = column[UUID]("uuid")
  // // The name can't be null
  // def name = column[String]("name")

  // def imageHref = column[String]("image_href")
  // // the * projection (e.g. select * ...) auto-transforms the tupled
  // // column values to / from a User
  // def * = (id, name, imageHref) <> ((Product.apply _).tupled, Product.unapply)
// }


// object Product {
  // def query = TableQuery[ProductTable]
// }
