# Task Manager Service

This is a task manager service which is build for managing tasks of a team.
## Tech Stack
1. Laravel (5.5,5.6, any) 
2. Mysql
## Functionalities
1. Ability to create a team
2. Ability to add member to a team
3. Ability to remove member from a team
4. Ability to create a project
5. Ability to create tasks inside a project
6. Ability to assign tasks to a team member

## Exposed endpoints

**Endpoint 1:**
```json
Create a team 

POST /teams
request:
{ 
    "name":"Platform",
}
response:
{ 
    "id":"b7f32a21-b863-4dd1-bd86-e99e8961ffc6",
    "name": "Platform",
}

```
**Endpoint 2:**
```json
Get the team details with teamId=id

GET /teams/:id
response:
{ 
    "id":"b7f32a21-b863-4dd1-bd86-e99e8961ffc6",
    "name": "Platform"
}

```
**Endpoint 3:**
```json
Create a member in a team with teamId=id

POST /teams/:id/member 
request:
{
    "name": "Vv",
    "email": "venkat.v@razorpay.com"
}
response:
{
    "id": "b7f32a21-b863-4dd1-bd86-e99e8961ffc6",
    "name": "Vv",
    "email": "venkat.v@razorpay.com"
}

```
**Endpoint 4:**
```json
Delete a team member with member id=id2 and teamId=id

DELETE /teams/:id/members/:id2
response:
    HTTP 204 No Content

```
**Endpoint 5:**
```json
Create a task in a team with teamId=id
Assignee_id should belong to the same team as the task.

POST /teams/:id/tasks
request:
{
    "title": "Deploy app on stage", 
    "description" : "We have built a new app which needs to be tested thoroughly",
    "assignee_id": "some member id from the same team", 
    "status": "todo"
}
response:
{
    "id": "2a913e52-81ea-4987-874d-820969a62ea6",
    "title": "Deploy app on stage", 
    "description" : "We have built a new app which needs to be tested thoroughly", 
    "assignee_id": "some member id from the same team", 
    "status": "todo"
}

```
**Endpoint 6:**
```json
Get the task with id=id2 and teamId=id

GET /teams/:id/tasks/:id2
response:
{
    "id": "2a913e52-81ea-4987-874d-820969a62ea6",
    "title": "Deploy app on stage",
    "description": "We have built a new app which needs to be tested thoroughly", 
    "assignee_id": "some member id from the same team",
    "status": "todo"
}

```
**Endpoint 7:**
```json
Edit the task with taskId=id2 and teamId=id
Assignee_id should belong to the same team as the task.

PATCH /teams/:id/tasks/:id2
request:
{
    "title": "Deploy app on preprod",
    "description":"new description",
    "assignee_id": "745dbe00-2520-420a-985d-0c3f5d280e57",
    "status": "done"
}
response:
{
    "id": "2a913e52-81ea-4987-874d-820969a62ea6",
    "title": "Deploy app on preprod",
    "description":"new description",
    "assignee_id": "745dbe00-2520-420a-985d-0c3f5d280e57",
    "status": "done"
}

```
**Endpoint 8:**
```json
List of all tasks ​for​ a team ​in​ todo status

GET /teams/:id/tasks/
response:
[
{
    "id": "2a913e52-81ea-4987-874d-820969a62ea6",
    "title": "Deploy app on preprod",
    "description":"new description",
    "assignee_id": "745dbe00-2520-420a-985d-0c3f5d280e57", 
    "status": "todo"
},
]

```
**Endpoint 9:**
```json
List of all tasks for a member in the team in todo status

GET /teams/:id/members/:id2/tasks/
response:
[
{
    "id": "2a913e52-81ea-4987-874d-820969a62ea6",
    "title": "Deploy app on preprod",
    "description":"new description",
    "assignee_id": "745dbe00-2520-420a-985d-0c3f5d280e57",
    "status": "todo"
},
]

```
## Running the environment
```
1. Clone the repository
    > git clone https://github.com/AnandPr123/TaskManagerAPI.git
    
2. Change the directory
    > cd TaskManagerAPI 
 
3. Create  .env file
    > cp .env.example .env
    
4. Open .env
    > nano .env
    
5. Change the following field
    DB_HOST=db
    
    Save the file when you’re done editing, you can do that by pressing Ctrl+x, then Y and Enter to confirm
    
6. Build the app image with the following command:
    > docker-compose build app
    
7. When the build is finished, you can run the environment in background mode with:
    > docker-compose up -d
  
8. To show information about the state of your active services, run:
    > docker-compose ps
    
9. Run composer install to install the application dependencies:
    > docker-compose exec app composer install
 
10. Do the migration
    > docker-compose exec app php artisan migrate 
    > docker-compose exec app php artisan migrate:refresh 
    
11. The last thing we need to do before testing the application is to generate a unique application key with the artisan Laravel command-line tool. This key is used to encrypt user sessions and other sensitive data:
    > docker-compose exec app php artisan key:generate
    
 ```   
## Hurray!  you are done, now open the Postman and hit the exposed endpoints on http://localhost:8000/api/

## Example
```
To create a team, hit api on
        
http://localhost:8000/api/teams
        
request:
    {
        "name":"Platform-tools"
    }
```
    
    
