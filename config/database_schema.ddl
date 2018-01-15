create table annual
(
  id integer not null
    primary key
  autoincrement,
  task text not null
)
;

create table biannual
(
  id integer not null
    primary key
  autoincrement,
  task text not null
)
;

create table month
(
  id integer not null
    primary key
  autoincrement,
  task text not null
)
;

create table quarter
(
  id integer not null
    primary key
  autoincrement,
  task text not null
)
;

create table week
(
  id integer not null
    primary key
  autoincrement,
  task text not null
)
;

