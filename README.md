## How you can start?

#### 1. Create DB and run SQL queries, code bellow
```sql
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `logs` (
  `id` int(255) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `user_telegram_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `language_code` varchar(2) NOT NULL,
  `last_request_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_telegram_id`);

ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

```

#### 2. Database configuration
 - Use ```config/database.yaml.example```, remove ```.example``` and add your credentials

#### 3. Endpoints
    [POST] localhost:8000/api/v1/telegram
-   Example body
```json
{
   "update_id":529806502,
   "message":{
      "message_id":3306,
      "from":{
         "id":1278424391,
         "is_bot":false,
         "first_name":"vlink3000",
         "language_code":"en"
      },
      "chat":{
         "id":1278424391,
         "first_name":"vlink3000",
         "type":"private"
      },
      "date":1590060660,
      "text":"Hello World!"
   }
}
```