# Holliday

*Yee-haw Cowboy!* Grab your horse and go for a ride to the link rotator corral with the deadliest Bandit around:


![Gif of Doc Holliday](public/img/readme/huckleberry.gif)


## History

Originally born out of [Centrifuge](https://github.com/ClickDiscover/Centrifuge), but Holliday is a completely new project built from the ground up.

Some of Centrifuge's code may find it's way into Holliday but a fresh start was chosen for a few reasons:

* The problem space is different - Centrifuge was geared for rendering static content (as in `wget http://stolen`) with 2 step offers.
* Better Abstraction - Holliday is primarily to be an API for fetching creatives for our active offers, this will enable embedding into other tools (i.e. CMS, Taboola, etc.)


## Features

- [x] PHP 7 :sparkles: :+1:
- [x] PSR-7 compliant middleware using ~~[zend-expressive](http://zend-expressive.readthedocs.org/)~~ [Slim 3](http://slimframework.com)
- [x] [Domain Driven Design](https://github.com/codeliner/php-ddd-cargo-sample): CRUD is so :poop:
- [x] CQRS & Event Sourcing: No more destructive :boom: updates, event sourced means every state transition in the system is logged. Amazing.
- [x] Hell I added some Unit Tests

## Basic API

Verb | Endpoint                    | Implemented ? | Notes
---- | --------                    | ------------- | -----
GET  | `/api/offers`               | ✓             | Returns all offers
GET  | `/api/offers/:id`           | 𐄂             | Return an offer by id
GET  | `/api/articles`             | 𐄂             | Return all articles
GET  | `/api/articles/:id`         | 𐄂             | Return article by id
GET  | `/api/articles/:id/slots`   | 𐄂             | Returns the ad slots for a particular article
GET  | `/api/articles/:id/offers`  | 𐄂             | Fetch a ranked (random) list of offers for an article
GET  | `/api/slot/:id`             | 𐄂             | Returns a particular slot
GET  | `/api/slot/:id/trafficking` | 𐄂             | Returns all trafficked offers for this slot
GET  | `/api/slot/:id/creatives`   | 𐄂             | Return creatives for the slot (Perhaps query arguments will enable the ordering)

