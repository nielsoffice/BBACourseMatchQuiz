# PHPCrud-sample-data
Support PHPWine v1.2.09

Create Crud with Boostrap sample data 

```SQL
// SQL 
CREATE TABLE `crud` (

 `friend_id` bigint(20) UNSIGNED NOT NULL,
 `friend_name` varchar(255) NOT NULL,
 `friend_mobile` varchar(255) NOT NULL,
 `friend_email` varchar(255) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `crud`
  ADD PRIMARY KEY (`friend_id`);
  
ALTER TABLE `crud`
  MODIFY `friend_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;
```

```SQL
INSERT INTO `crud` (`friend_name`, `friend_mobile`, `friend_email`) VALUES
('Nikkie The Drummer'    , '999.999.999' , 'nikki@mail.com'),
('Marian The Base Guitar', '999.999.999' , 'marian@mail.com'),
('Japz The Song Leader'  , '999.999.999' , 'japz@mail.com'),
('Niel The All around'   , '999.999.999' , 'niel@mail.com');
```

Download <a href="https://github.com/nielsofficeofficial/PHPWine"> PHPWine > </a> <br />
Download <a href="https://github.com/nielsofficeofficial/PHPCrud"> PHPCrud > </a>

Article Link: https://nielsoffice197227997.wordpress.com/2022/03/05/phpcrud-sample-data-phpwine-v1-2-10/

<h2>Thanks To:</h2>
<h5>
Github : To allow me to upload my PHPWine plugin Vanilla Flavour to repository<br /> 
php.net : To oppurtunity Develop web application using corePHP - PHPFrameworks<br />
</h5>


<hr />
Would you like me to treat a cake and coffee ? <br />
Become a donor, Because with you! We can build more... 

Donate: <br />
GCash : +639650332900 <br /> 
Paypal account: syncdevprojects@gmail.com
<hr />
<br />
Thanks and good luck! 
