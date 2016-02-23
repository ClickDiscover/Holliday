name := "fun"
version := "0.1.0"
scalaVersion := "2.11.6"

lazy val doobieVersion = "0.2.3"

libraryDependencies ++= Seq(
  "com.typesafe.akka" %% "akka-actor" % "2.4.2",
  "com.typesafe.akka" %% "akka-stream" % "2.4.2",
  "com.typesafe.akka" %% "akka-http-core"          % "2.4.2",
  "com.typesafe.akka" %% "akka-http-experimental"               % "2.4.2",
  "com.typesafe.akka" %% "akka-http-jackson-experimental"    % "2.4.2",
  "org.postgresql"     %  "postgresql"                           % "9.4-1201-jdbc41",
  "org.tpolecat" %% "doobie-core"               % doobieVersion,
  "org.tpolecat" %% "doobie-contrib-postgresql" % doobieVersion,
  "org.tpolecat" %% "doobie-contrib-specs2"     % doobieVersion
  // "com.typesafe.slick" %% "slick" % "3.1.1",
  // "org.slf4j" % "slf4j-nop" % "1.6.4"
  // "com.typesafe.akka" %% "akka-http-testkit-experimental"       % "2.4.2-RC2"
)

initialCommands in console := """
  import io.clickdiscover.holliday._
"""
