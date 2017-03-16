# Extract MSISDN

1. Create an application with following requirements:

- latest PHP or Golang
- takes MSISDN as an input
- returns MNO identifier, country dialling code, subscriber number and country identifier as defined with ISO 3166-1-alpha-2
- do not care about number portability

2. Write all needed tests.

3. Expose the package through an RPC API, select one and explain why have you chosen it.

4. Use git, vagrant and/or docker, and a configuration management tool (puppet, chef, ansible ...).

5. Other:


#Instructions:

- Php application is located in ExtractMSISDN/Laravel folder.
- It takes MSISDN as input. It can starts with + or 00.
- Information about countries and network operators are stored in database

- There is file grabit.sql - script to create the database

- One way to start application is typing http://localhost/extractMSISDN/laravel/public/ in the browser
- Second : use command "php artisan serve" in cmd, then type http://localhost:8000/extract in the browser
- Third, using JSON formatted output, type http://localhost:8000/decode/{number}, ex. number=+38975123456
(I choose JSON format as it is most commonly used)

- To run test, use command "php artisan dusk" in cmd

