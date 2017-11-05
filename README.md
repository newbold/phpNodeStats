# phpNodeStats

Bitcoin node statistics for everyone!

## About

phpNodeStats is a simple web-based Bitcoin node monitor. It's provided under the [MIT](https://opensource.org/licenses/MIT) license.

## Demo

You can view an instance in action here: https://bitcoin.neatnik.net

Here’s how it looks:

![phpNodeStats screen](http://i.imgur.com/FzRMinq.png)

## Installation

Download index.php and:
  
1. Customize the values in the configuration section.
2. Upload the PHP file to your web server.
3. Ensure that PHP can write to the directory containing the file.

That's it!

## Tech Notes

phpNodeStats will create two files in the directory where it runs (connections.txt contains the connected peer counts, and geodata.txt caches peer location data). Be sure that PHP has permission to create these files, or create them yourself and ensure that PHP has permission to write to them.

If you’d like to ensure that your average peer count is kept updated, you should call the script each minute via a cron entry like this:

`* * * * * curl http://example.com/directory/index.php >/dev/null 2>&1`

## Donations

If you feel inclined to contribute to phpNodeStat’s development, you can send a few Satoshis to 3PCJtx1dgv45x42qvN57kRhhgzM74ygfVj. Thanks!
