# Overeaters Anonymous Website

Base repo to support the Overeaters Anonymous website, built in WordPress.

The following notes are more guidelines than enforced policies. Please reach out to the OA team for any problems, issues, suggestions.

## Repo Notes

- WordPress managed by [Bedrock](https://roots.io/bedrock/)
- Noticably absent from this repo:
- WordPress Core: this is by design, no need to replicate, please do not commit. Lastest WordPress will be installed on servers as part of deployment. Each dev is responsible for setting up their own local dev environment via composer.
- `web/app/uploads/`: also by design, please do not commit
- `.gitignore` has been setup to help enforce these concepts, please update as needed or reasonable if it is causing problems.

## Environment setup

Environment is being managed via [Bedrock](https://roots.io/bedrock/),  a modern WordPress stack that helps you get started with the best development tools and project structure.

Much of the philosophy behind Bedrock is inspired by the [Twelve-Factor App](http://12factor.net/) methodology including the [WordPress specific version](https://roots.io/twelve-factor-wordpress/).

### Requirements
* [WordPress](https://wordpress.org/) >= 5.2
* PHP >= 7.1
* Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* [Node.js](http://nodejs.org/) >= 8.0x
* [Yarn](https://yarnpkg.com/en/docs/install)

### Installation

1. Pull in git project repository:
`git pull origin master`

2. OA team can provide `.env` file and you can customize environment variables in `.env`  file
* `DB_NAME` - Database name
* `DB_USER` - Database user
* `DB_PASSWORD` - Database password
* `DB_HOST` - Database host
* `WP_ENV` - Set to environment (`development`, `staging`, `production`)
* `WP_HOME` - Full URL to WordPress home (http://example.com)
* `WP_SITEURL` - Full URL to WordPress including subdirectory (http://example.com/wp)
* `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`
* `ACF_PRO_KEY` - If using acf pro, provide key with this configuration

If you want to automatically generate the security keys (assuming you have wp-cli installed locally) you can use the very handy [wp-cli-dotenv-command][wp-cli-dotenv] or, you can cut and paste from the [Roots WordPress Salt Generator][roots-wp-salt].

3. Theme is brought down via git repository in `web/app/themes`

4. We are using `http://oa.local` as our local development url

5. Set your site vhost document root to `/path/to/site/web/` (`/path/to/site/current/web/` if using deploys)

6. In project root, run `composer install` to bring down wordpress core, dependencies and contributed plugins

7. Import your database provided by OA team or it will ask to install barebones copy

8. Access WP admin at `http://oa.local/wp/wp-admin`


## Development / Deployment Workflow

* Deployments to staging and production will be triggered manually by the OA team

#### Branch Descriptions
* `/master`
* core base code used to merge dev code and keep clean
* `/dev`
* use the dev branch for local development, commit work frequently
* `/staging`
* changes commited to staging will be deployed to staging environment
* `/production`
* contains only production ready code

### Theme Management

* To get the initial theme build, navigate to the theme dir `cd web/app/themes/oa/`
* Run `yarn` to update dependencies
* Run `yarn build` to compile the build, a `dist` dir will be created, do not commit it, prod and staging branches will be compiled for production by the OA team

Please review documention in theme directory for further notes. Files can be comitted directly to the root of this git project repository https://github.com/OvereatersAnonymous/website/tree/master/web/app/themes/oa

For full deployment notes on the server and additional gotchas, please review this document which requires our permission to access  https://docs.google.com/document/d/16-2whcdwdwuVEd-3lZlSR877Knjc6fBeN-hMtkXuWIo

### Plugin Management

**Contrib Plugins**

- Contrib plugins can be brought in via composer to `/web/app/plugins/plugin-name` using `composer require <package_name>:<version_number>`
- Source for wordpress composer packages  https://wpackagist.org

**Custom Plugins**

- Custom plugins should be set up so that they can be brought in via composer to `/web/app/plugins/plugin-name`

**Custom Must Use Plugins**

- Custom must use plugins should be set up so that they can be brought in via composer to `/web/app/mu-plugins/plugin-name`

**Composer setup for custom plugins or must-use plugins**

- This works via git's tagging system. 
- After you commit your files ready for deployment, within the plugin repository, run `git pull origin --tags` to get all the remote tag references and `git tag -l` to list all tags 
- Create a tag increasing the version number. So if it's 1.0.0, increase to 1.1.0 for minor code changes and updates or 2.0.0 for major code changes. Run `git tag <version_number>` and then run `git push origin --tags`

***Creating a new plugin***
- For creating a new plugin via composer, create a  `composer.json` and add the following template changing the name of your plugin where you see `<plugin-name>` and the type, either `wordpress-plugin` or `wordpress-muplugin` where you see `<plugin-type>`
```
{
    "name": "OvereatersAnonymous/<plugin-name>",
    "description": "",
    "keywords": ["wordpress", "plugin"],
    "homepage": "https://github.com/OvereatersAnonymous/<plugin-name>",
    "authors": [
        {
            "name": "Cloudred",
            "homepage": "https://cloudred.com"
        }
    ],
    "type": "<plugin-type>",
    "require": {
        "php": ">=7.1"
    }
}
```
- Make sure you commit and tag the plugin's `composer.json` file
- Go back to root directory and open up the project's `composer.json` file and add the following at the end of the `repositories` array
```
    ,
      {
        "type": "git",
        "url": "https://github.com/OvereatersAnonymous/<plugin-name>.git"
      }

```

- Once you save, you can then run `composer require "OvereatersAnonymous/<plugin-name>:<version_number>"` , this will checkout the plugin directory to the tag and add references in both `composer.json` and `composer.lock` files.

***Updating a new plugin***
- For Updating, you just need to run `composer require "OvereatersAnonymous/<plugin-name>:<version_number>"`

***Committing and deployment***
- Commit both composer files and push. Run through deployment as usual
- On server, you only run `composer install`
