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
  kategory:
    label: Kategorie
    type: multicheckbox
    options:
      personalstuff: Personal stuff
      nerdstuff: Nerd stuff
  text:
    label: Text
    type:  textarea
    size:  large
	tag:
		label: Tags
		type: tags
		index: all
	language:
		label: Language
		type: radio
		options:
      firstValue: deutsch
      secondValue: english