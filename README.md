# Magento CE Newsletter Extension

This is an extension that creates three new columns in `newsletter_subscriber` table: `created_at`, `confirmed_at` and `unsubscribed_at`.

The purpose is to store timestamps whenever a newsletter subscriber either subscribes, confirms subscription or unsubscribes from the newsletter.

These can be seen in admin grid under *Newsletter > Newsletter Subscribers*.

## Installation

Just copy to your Magento project root.

## Compatibility

Developed for Magento CE 1.9.2.4, not tested on any other.
Most likely works with Magento CE >= 1.9, or even older. You're welcome to submit a PR and document in case you've tested with versions prior to 1.9 CE!