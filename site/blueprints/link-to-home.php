<?php if(!defined('KIRBY')) exit ?>

title: Blog
pages:
  template: blogarticle
  sort: flip
  limit: 2
files: true
fields:
  title:
    label: Title
    type:  text
  author:
    label: Autor
    type:  text
