<?php if(!defined('KIRBY')) exit ?>

# default blueprint

title: Blogartikel
pages: true
files: true
fields:
  title:
    label: Title
    type: text
  date:
    label: Date
    type:  date
  text:
    label: Text
    type:  textarea
    size:  large
    buttons:
      - h1
      - h2
      - h3
      - bold
      - italic
      - email
      - link
  tags:
    label: Tags
    type: tags
    index: all
    data:
      - design
      - architecture
      - photography
      - development
      - web
  language:
    label: Language
    type: radio
    options:
      firstValue: deutsch
      secondValue: english
    default: firstValue
