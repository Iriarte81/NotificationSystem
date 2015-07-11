# Build Your First App (Laravel 5.1) - Simple Email Notification Application from Laracasts.com

About This Series

Made your way through Laravel 5 Fundamentals, and now feel ready to take the next step? Let's build our first little app together, one step at a time! We'll tackle a small, but useful tool that I require for Laracasts. This will give us some nice seeds to discuss authentication, forms, Eloquent, and more!

## <a href="https://github.com/Iriarte81/NotificationSystem/commit/d0fd2e2b32606cb179cd52410ad55da3ef802e8f">Registration Form, Login, Migrations, a few Routes, some Styles</a>

Before we dive into the code, let me give you a quick tour of what we're planning to build. Don't worry; it's nothing too complex. Next, let's work on some basic routing for our app, while also prepping our main master page. An SQLite database should suffice for this little project. So let's setup the necessary configuration for this. Additionally, we'll ensure that the authentication layer for our app is working, as expected. Yay - we get to start building the form that allows users of our app to prepare and deliver DMCA take-down requests to these various content providers. We're not overly interested in design for this application, but, nonetheless, even though we're developers, let's at least take a moment or two to tweak the design, while setting up Laravel Elixir.


## <a href="https://github.com/Iriarte81/NotificationSystem/commit/5e3d09552b4267540860d76a4dc2c6e3394fdd1e">Add service providers, confirmation form, persist to database</a>

If the plan is to fire off these emails to various content providers (like YouTube, Vimeo, and Viddler), then we should go ahead and set up the appropriate table and Eloquent model. We're almost ready to deliver these dang DMCA requests! But, first, I want to give the user the ability to preview the email that will be sent. This way, should they need to, they can modify the message, as needed. So we have all the information that we require from the user. Let's now persist this data to a new "notices" table, so that the user may track the take-downs that they've fired off.


## <a href="https://github.com/Iriarte81/NotificationSystem/commit/839c10c9a448a8c3f25fc12414987789796d3004">Mailer, Updated Notices Screen</a>

Well, it's time to actually fire off these notifications to YouTube, Vimeo, etc. Let's review our options in this episode. One wonderful thing about Laravel is that it includes a number of drivers for its various components. Mail is no different. Let's use this lesson to setup Mandrill for our application. It's so easy! So far, the main "notices" overview page is simply returning JSON. We clearly don't want that, so let's provide a nice table display, sot that the user may track all of the take-down requests that they've filed. 


## <a href="https://github.com/Iriarte81/NotificationSystem/commit/5ef0bb3bff5a0cfc8f67f7df55b32d50fc43a2f7">Minor Tweaks, Flash message, Submit Button</a>

It's the final episode of this series, so we have a bunch to do! We'll begin by working on various loose ends. Toward the end of the episode, we'll take a break from our PHP, and write some JavaScript to allow for AJAX form submissions and such.

Thanks for coming along for the ride! Feel free to take it from here, and add more functionality.
