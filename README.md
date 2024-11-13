## Installation

### Laravel

```shell
composer install
```

```shell
cp .env.example .env
```

```shell
php artisan key:generate
```

> For development
 
```shell
php artisan serve
```

### Integrating Vue 3 + pinia + vue route

```shell
npm install vue@latest @vitejs/plugin-vue pinia vue-router@4
```
<details>
    <summary>Possible Solution for error when try to build</summary>

Error: Cannot find module @rollup/rollup-linux-x64-gnu. npm has a bug related to optional dependencies... 

The error you're seeing relates to a compatibility issue or installation problem with Rollup on your server. This can happen on live servers due to inconsistencies in module installation. Here’s how to troubleshoot and fix it:

### Steps to Resolve

1. **Remove `node_modules` and `package-lock.json`:**
   This error may be related to corrupted or incompatible dependencies. Start by removing these directories and files and reinstalling the packages:

   ```bash
   rm -rf node_modules
   rm package-lock.json
   ```

2. **Reinstall Dependencies with Compatibility Fixes:**
   Reinstall the dependencies and ensure Rollup and other packages are correctly downloaded:

   ```bash
   npm install
   ```

   If your environment has issues resolving the Rollup dependency, try explicitly installing the Rollup library:

   ```bash
   npm install rollup --save-dev
   ```

3. **Verify Node.js and npm Versions:**
   Ensure the live server is using a Node.js and npm version compatible with Vite and Rollup. The latest Vite versions typically work well with Node.js 16 or 18. You can check your current versions by running:

   ```bash
   node -v
   npm -v
   ```

   If your server’s Node.js version isn’t compatible, consider switching to a compatible version. On servers where you have control, tools like `nvm` can help switch Node.js versions.

4. **Clear npm Cache:**
   Cached files sometimes cause installation issues, so clearing the npm cache might help:

   ```bash
   npm cache clean --force
   ```

5. **Retry the Build:**
   After reinstalling dependencies, try building again:

   ```bash
   npm run build
   ```

6. **Install Missing Optional Dependencies (If Needed):**
   Some environments may need optional dependencies specified. For instance, try installing `@rollup/rollup-linux-x64-gnu` if it’s referenced:

   ```bash
   npm install @rollup/rollup-linux-x64-gnu --save-dev
   ```

If these steps don't work, it may help to contact your hosting provider’s support team to verify any limitations related to the Node environment, especially if you’re using a managed host like Cloudways.
</details>
