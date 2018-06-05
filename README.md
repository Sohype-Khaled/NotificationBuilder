# Laravel Notification Builder (in development)
This Package provides a notification system for your website, it allows the site owner or the permitted ones to add/delete/update notification templates, recipients lists, and notification methods -Email, FCM, SMS..etc.- 


feel free to contribute/improve the code


please note that this package is in development process.

#Usage
1. vendor publish
    ```
        php artisan vendor:publish 
    ```
2. In order to get notification from models actions : 
    * seed the model action (create, update, delete, suspend..etc.) in the seeds dricetory
    * register the model show route in NotificationBuilder config
    * use notifying trait in the model
        ```
            use NotificationBuilder\Traits\Notifying;
        ```
    * use the function notifying in your code
        ```
            $model->notifying('action-name');
        ```