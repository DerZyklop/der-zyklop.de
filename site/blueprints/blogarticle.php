<?php if(!defined('KIRBY')) exit ?>

title: Blogartikel
pages: true
files: true
fields:
  title:
    label: Title
    type: text
  date:
    width: 3/4
    label: Date
    type:  date
  justforrss:
    width: 1/4
    label: Just for RSS feed?
    type: checkbox
    default: off
  targetgroup:
    width: 1
    label: Das versteht
    type: radio
    options:
      big: auch der Mainstream
      small: nur die Nerds und Designer
    default: deutsch
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
    width: 1/2
    label: Tags
    type: tags
    index: all
  language:
    width: 1/2
    label: Language
    type: radio
    options:
      deutsch: Deutsch
      english: English
    default: deutsch
  comments:
    label: Comments disabled
    type: checkbox
