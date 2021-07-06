## PHP USSD Name Scrapping script

1. Configure the sever's URL and API Key in the 'config.json' file
2. Rename the csv file with numbers to numbers.csv and place it at the root of the project.
3. Run the linux command `split -l 1000 numbers.csv newnumbers` to split the file into chunk files of 1000 lines each
4. For chunk file generated, run the command `php scrap -f <filename>` to begin the name scrapping
5. Monitor and document