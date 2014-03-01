<?php if(!defined('KIRBY')) exit ?>

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
  language:
    label: Language
    type: radio
    options:
      firstValue: deutsch
      secondValue: english
    default: firstValue
  justforrss:
    label: Just for RSS feed?
    type: checkbox
    default: off
