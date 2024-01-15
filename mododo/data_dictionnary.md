## Data Dictionnary in upstream of modelisation

Posts

| Name          | Type    | Size | Description                   |
| ------------- | ------- | ---- | ----------------------------- |
| num_post      | bigint  | -    | ID of the post                |
| title         | varchar | 100  | Title of the post             |
| descrip       | text    | -    | Description of the post       |
| descrip_short | varchar | 150  | Short description of the post |
| audio_link    | text    | -    | Audio link of the post        |
| created_at    | Date    | -    | Created time                  |
| updated_at    | Date    | -    | Updated time                  |

Category

| Name         | Type    | Size | Description          |
| ------------ | ------- | ---- | -------------------- |
| num_category | bigint  | -    | ID of the category   |
| name         | varchar | 50   | Name of the category |
| created_at   | Date    | -    | Created time         |
| updated_at   | Date    | -    | Updated time         |

Comment

| Name        | Type   | Size | Description            |
| ----------- | ------ | ---- | ---------------------- |
| num_comment | bigint | -    | ID of the comment      |
| body        | text   | 50   | Content of the comment |
| created_at  | Date   | -    | Created time           |
| updated_at  | Date   | -    | Updated time           |

Users

| Name       | Type    | Size | Description               |
| ---------- | ------- | ---- | ------------------------- |
| num_users  | bigint  | -    | ID of the users           |
| pseudonyme | varchar | 100  | Name of the users         |
| avatar     | varchar | 100  | Picture link of the users |
| created_at | Date    | -    | Created time              |
| updated_at | Date    | -    | Updated time              |
