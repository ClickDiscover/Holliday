name := "fun"
version := "0.1.0"
scalaVersion := "2.11.6"


libraryDependencies ++= Seq(
  "com.typesafe.akka" %% "akka-actor" % "2.4.2-RC2",
  "com.typesafe.akka" %% "akka-stream" % "2.4.2-RC2",
  "com.typesafe.akka" %% "akka-http-core"          % "2.4.2-RC2",
  "com.typesafe.akka" %% "akka-http-experimental"               % "2.4.2-RC2",
  "com.typesafe.akka" %% "akka-http-jackson-experimental"    % "2.4.2-RC2",
  "org.postgresql"     %  "postgresql"                           % "9.4-1201-jdbc41",
  "com.typesafe.slick" %% "slick" % "3.1.1",
  "org.slf4j" % "slf4j-nop" % "1.6.4"
  // "com.typesafe.akka" %% "akka-http-testkit-experimental"       % "2.4.2-RC2"
)


