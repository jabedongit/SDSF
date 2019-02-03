# SDSF
Subject-Driven Data Sharing Framework

Description:

1. This is the implemenation of a "proof-of-concept" of subject-driven data sharing framework. 
2. This project allows the data subject to share his academic record with a prospective employee.

Flow of the Program:

1. Data subject login to the university system (developed as a web application) and access his academic record.
2. Data subject then clicks on the "Share" button to share his academic record. It redirects him to the Authorisation Manager (AM). It is to be mentioned that the university system (web application) is registerd with the AM.
3. AM provides the policy defination interface to the data subject. He defines the data sharing policy. The policy is then encoded using our syntax. The policy is then serialised and checked for format. If the checking is sucessfull then it is stored in the policy storage module.
4. The AM then generates a security token and store it as the "policy-id" and also as the mapping between the resource and the policy.
5. The resource url and the token is then passed to the data consumer.
6. The consumer then click on the link and redirected to the AM. He is authenticated at the AM and then the policy is evaluated. If the policy is evaluated sucessfully then the data consumer is redirected to the data custodian with the authorisation token. The data custodian verify the token and provide access to the data consumer.

Tools and Programming Languages:

1. HTML, PHP, JavaScript, C# is used to develop the Data Cusotidian and AM Services.
2. MySQL is used to stores security tokens and other information.
3. JSON is used to encode the data sharing and re-sharing policies.
