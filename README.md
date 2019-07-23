<p align="center"><img src="https://storage.googleapis.com/firevel-public/images/logo.png"></p>

## About Firevel

Firevel is a modified, serverless version of [Laravel Framework](https://laravel.com/) designed to work inside Google App Engine standard environment, together with [Google Firestore](https://cloud.google.com/firestore/) as database and cache.

In addition to standard [Laravel Framework](https://laravel.com/) benefits it offers:

- Simple, serverless setup.
- Downscaling to zero.
- Micro-service friendly design.
- [Free tier eligibility](https://cloud.google.com/free/).
- Capacity to deal with high loads.

## Installation

1) Create a project in the [Google Cloud Platform Console](https://console.cloud.google.com/project).

2) [Install gcloud command-line tool](https://cloud.google.com/sdk/gcloud/).

3) Create firevel project with:
```
composer create-project firevel/firevel
```

3) Deploy project with:
```
gcloud app deploy
```

Firevel does not require any credentials while running inside App Engine. If you like to run it locally you will also need to set `GOOGLE_CLOUD_PROJECT` and `GOOGLE_APPLICATION_CREDENTIALS` .env variables.

## Differences between [Laravel](https://laravel.com) and Firevel.

Firevel is a Laravel 5.8 after [small updates](https://github.com/firevel/firevel/commits/master) and packages installation:
- [Firestore Session driver](https://github.com/firevel/firestore-session-driver)
- [Firestore Cache driver](https://github.com/firevel/firestore-cache-driver)
- [Stack driver log channel](https://github.com/firevel/stackdriver-log-channel)
- [Laravel Firestore wrapper](https://github.com/firevel/firestore)
- [Firequent](https://github.com/firevel/firequent)

## Usage

You can use Firevel in the same way you use Laravel. Be aware of [Firebase limits](https://firebase.google.com/docs/firestore/quotas) and [Google App Engine limits](https://cloud.google.com/appengine/docs/standard/php7/runtime).

You should also replace Eloquent models with [Firequent](https://github.com/firevel/firequent), by using `use Firevel\Firequent\Model;` instead of `use Illuminate\Database\Eloquent\Model;` inside a model class. Keep in mind that Firequent is in beta and support only basic queries.

## CI

You can run a simple CI process with `gcloud builds submit --config cloudbuild.yaml --substitutions _APP_KEY=` with your production API key at the end. You can also [connect it with your existing repository](https://cloud.google.com/source-repositories/docs/quickstart-triggering-builds-with-source-repositories) but remember to setup _APP_KEY.

## More
- [App Engine documentation](https://cloud.google.com/appengine/docs/standard/php7/)
- [How Requests are Routed](https://cloud.google.com/appengine/docs/standard/php7/how-requests-are-routed)
- [Get to know Cloud Firestore](https://www.youtube.com/watch?v=v_hR4K4auoQ&list=PLl-K7zZEsYLluG5MCVEzXAQ7ACZBCuZgZ)

## Credits
- [Taylor Otwell](https://medium.com/@taylorotwell) - for building Laravel.
- [SpringboardVR](https://springboardvr.com/) - for allowing this project to happen by providing initial production case.
- [Google Cloud](https://cloud.google.com/) - for building great products.
