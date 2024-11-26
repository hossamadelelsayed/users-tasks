### **Setup And Usage Steps:**

1. **Install Dependencies (`composer install`)**
2. **Set Up the Environment (`.env` file)**
   - configure your database credentials by copying the example `.env` file and updating it with your database details.
4. **Run Migrations (`php artisan migrate`)**
5. **Seed the Database (`php artisan db:seed`)**
7. **Serve the Application**
    To run the application locally, you can use Laravel's built-in development server:
    `php artisan serve`
6. **Access the API**
        Once the server is running, you can test the API by hitting the following endpoint:
        GET `http://localhost:8000/api/v1/users/1`

7. **Example Response**
        If the API call is successful, you will receive a JSON response similar to the one below:
        `{
            "status": true,
            "data": {
                "user": {
                    "id": 1,
                    "name": "Jordi Mitchell",
                    "email": "dexter93@example.net"
                },
                "top_assessment": {
                    "name": "Philosophy Quiz",
                    "score": "3 / 6",
                    "percentage": "50 %"
                },
                "top_survey": {
                    "name": "Audience Insights Survey",
                    "score": "16 / 22",
                    "percentage": "72.73 %"
                },
                "statistics": {
                    "tasks_score_average": 13.2,
                    "tasks_progress_average": 57.3,
                    "assessments_count": 5,
                    "surveys_count": 5
                },
                "last_activity": {
                    "action": "Started Assessment",
                    "entity": "Assessment",
                    "created_at": "2024-12-01 00:00:00"
                },
                "logs": {
                    "2024-12-01": [
                        {
                            "action": "Started Assessment",
                            "entity": "Assessment",
                            "created_at": "2024-12-01 00:00:00"
                        }
                    ]
                }
            },
            "message": "User found successfully"
        }
        `

### Explanation of JSON Example:
- **status**: Indicates the success of the API request.
- **data**: Contains the actual user and task-related data.
  - **user**: Information about the user (ID, name, email).
  - **top_assessment** and **top_survey**: The user's highest-scoring assessment and survey with percentage values.
  - **statistics**: Includes average task scores, task progress, and counts for assessments and surveys.
  - **last_activity**: Shows the most recent activity of the user.
  - **logs**: Contains historical activity logs grouped by date. Each action is related to a specific entity (e.g., Survey, Assessment).
