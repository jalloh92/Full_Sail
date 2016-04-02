---
layout: post
title:  "My First Post"
date:   2015-03-02 14:21:30
categories: jekyll update
tags: cat jekyll terminal
---

There is going to be so much to learn this month!  Since I used to be an engineer, I like to take things apart and understand how they work, so learning about Jekyll is right up my alley.  I'm happy to see that there are ways to easily assemble a website where you only have to define a piece in one place -- less chance for error and repition!  I want to spend some time tomorrow reading up / watching videos on this, markdown and on terminal so I feel more comfortable with this subject area.

I started tonight by reading the documentation on the Jekyll site.  I ran across the code to insert an image so I thought it would be simple.  However, when I tried to insert a picture of Chewie, it kept breaking the entire site.  It turns out that the _site folder wasn't recieving the image of my cat.  However, after restarting terminal, removing the url text on the config page and renaming the folder to not include an underscore...it worked!

Behold...Princess Chew Chew Kitten Pants!

![My cat]({{ site.url }}/assets/chewie.jpg)
