README:

Follow instructions on https://www.smddzcy.com/2016/01/tutorial-multi-threading-in-php7-pthreads/ to install the proper version of PHP and pthreads. Don't vere from these instructions, setting up pthreads on OSX is a pain.

Consider running the following if there is an issue with older versions of php already on your system:
```brew remove --force --ignore-dependencies httpd
brew remove --force --ignore-dependencies php70-xdebug php71-xdebug
brew remove --force --ignore-dependencies php70-imagick php71-imagick
brew remove --ignore-dependencies --force php70 php71 php72```
