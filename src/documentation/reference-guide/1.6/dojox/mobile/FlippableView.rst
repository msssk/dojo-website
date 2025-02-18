.. _dojox/mobile/FlippableView:

dojox.mobile.FlippableView
==========================

:Status: Draft
:Version: 1.0
:Authors: Yoshiroh Kamiyama
:Developers: Yoshiroh Kamiyama
:Available: since V1.6

.. contents::
    :depth: 2

FlippableView is a container widget that represents entire mobile device screen, and can be flipped horizontally. FlippableView is a subclass of View (=:ref:`dojox.mobile.View <dojox/mobile/View>`). FlippableView allows the user to swipe the screen left or right to flip between the views. When FlippableView is flipped, it finds an adjacent FlippableView, and opens it.

======================
Constructor Parameters
======================

Inherited from dojox.mobile.View:
---------------------------------

+--------------+----------+---------+-----------------------------------------------------------------------------------------------------------+
|Parameter     |Type      |Required |Description                                                                                                |
+--------------+----------+---------+-----------------------------------------------------------------------------------------------------------+
|selected      |Boolean   |No       |If true, the view is displayed at startup time. The default value is false.                                |
+--------------+----------+---------+-----------------------------------------------------------------------------------------------------------+

=====
Usage
=====

Basic usage is the same as for :ref:`dojox.mobile.View <dojox/mobile/View>`. Flipping will be performed in the order you place FlippableViews in a page.

========
Examples
========

Declarative example
-------------------

In this example, there are two FlippableViews, and the user can swipe the screen to flip the views back and forth.

.. code-block :: html

  <div id="foo" dojoType="dojox.mobile.FlippableView" selected="true">
    <h2 dojoType="dojox.mobile.RoundRectCategory">Page flipping demo</h2>
    <div dojoType="dojox.mobile.RoundRect">
      Swipe the screen left or right to flip between the views.
    </div>
  </div>

  <div id="bar" dojoType="dojox.mobile.FlippableView">
    <h1 dojoType="dojox.mobile.Heading">View 2</h1>
    <div dojoType="dojox.mobile.RoundRect">
      View 2
    </div>
  </div>

.. image :: FlippableView-anim.gif
