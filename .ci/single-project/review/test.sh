# Run unit tests
./vendor/bin/phpunit

# Exit in the case of failure
if [ $? -eq 1 ]
then
  exit 1
fi