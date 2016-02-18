package io.clickdiscover.holliday

import doobie.imports._
import scalaz._
import Scalaz._
import scalaz.concurrent.Task
import scalaz.stream._
// import java.sql.{Date => SqlDate}
// import org.joda.time.LocalDate
// import org.joda.time.DateTimeZone
// import Json._


import java.util.UUID
import doobie.contrib.postgresql.pgtypes.UuidType



object Database {

  val tx = DriverManagerTransactor[Task]("org.postgresql.Driver", "jdbc:postgresql:clickdiscover", "patrick", "")


  def findAllProducts =
    sql"SELECT uuid as id, name, image_href as image FROM products"
      .query[Product]
      .list
      .transact(tx)


    // def findProduct(id: UUID): Option[Product] =
      // sql"SELECT uuid as id, name, image_href as image FROM products where uuid = $id"
        // .query[Product]
        // .option
        // .transact(tx)

  // implicit val localDateMeta: Meta[LocalDate] =
    // Meta[SqlDate].xmap(
      // s => new LocalDate(s.getTime),
      // l => new SqlDate(l.toDateTimeAtStartOfDay(DateTimeZone.UTC).getMillis)
    // )

  // def create(artist: Artist, band: Band): Process[ConnectionIO, (ArtistId, BandId)] =
    // for {
      // aid <- createArtist(artist)
      // bid <- createBand(band)
      // _   <- link(aid, bid)
    // } yield (aid, bid)

  // def createArtist(artist: Artist): Process[ConnectionIO, ArtistId] =
    // sql"INSERT INTO artists (name) VALUES (${artist.name})".update.withGeneratedKeys[ArtistId]("id")

  // def createBand(band: Band): Process[ConnectionIO, BandId] =
    // sql"INSERT INTO bands (name, started) VALUES (${band.name}, ${band.started})".update.withGeneratedKeys[BandId]("id")

  // def link(artist: ArtistId, band: BandId): Process[ConnectionIO, Int] =
    // Process.eval {
      // sql"INSERT INTO bands_artists (artist_id, band_id) VALUES (${artist.id}, ${band.id})".update.run
    // }

  // case class BandArtistJoin(bid: BandId, b: Band, aid: ArtistId, a: Artist)

  // def findBandsWithArtists =
    // sql"""
      // SELECT b.id, b.name, b.started, a.id, a.name
      // FROM bands b
      // INNER JOIN bands_artists ba ON (b.id = ba.band_id)
      // INNER JOIN artists a ON (a.id = ba.artist_id)
      // ORDER BY b.id
    // """.query[BandArtistJoin].process.chunkBy2 { _.bid == _.bid }.map(groupToBands)

  // def groupToBands(bas: Vector[BandArtistJoin]): BandArtistView =
    // BandArtistView(
      // BandView(bas.head.bid, bas.head.b),
      // bas.map { b =>
        // ArtistView(b.aid, b.a)
      // }
    // )
}
