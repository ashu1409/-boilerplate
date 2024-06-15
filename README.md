# Location Identification App

This is the Location Identification system built with Symfony for the backend and Nuxt 3 with VueJS 3 for the frontend. The application allows users to log in, view their transactions, and associate transactions with locations using the Google Places API.

## Prerequisites

Before you begin, ensure you have met the following requirements:
- You have installed Docker and Docker Compose.
- You have installed Node.js and npm.
- You have a Google Places API key.

## Getting Started

### Backend Setup

Follow these steps to set up and run the Symfony backend.

1. **Clone the repository**

    ```bash
    git clone -b v2 git@github.com:your-avatar/symfony-boilerplate.git
    cd symfony-boilerplate
    ```

2. **Create your own fork of the project.**

3. **Install dependencies**

    ```bash
    composer install
    ```

4. **Set up environment variables**

    Create a `.env` file in the project root and add your Google Places API key:

    ```env
    GOOGLE_PLACES_API_KEY=your_api_key_here
    ```

5. **Initialize the database and load fixtures**

    ```bash
    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate
    php bin/console doctrine:fixtures:load
    ```

6. **Run the Symfony server**

    ```bash
    symfony server:start
    ```

### Frontend Setup

Follow these steps to set up and run the Nuxt 3 frontend.

1. **Clone the repository**

    ```bash
    git clone git@github.com:your-avatar/location-identification-frontend.git
    cd location-identification-frontend
    ```

2. **Install dependencies**

    ```bash
    npm install
    ```

3. **Configure Axios**

    Ensure Axios is configured to point to your backend API. Update `nuxt.config.js` if necessary:

    ```js
    export default {
      modules: [
        '@nuxtjs/axios',
      ],
      axios: {
        baseURL: 'http://localhost:8000/api', // Update with your Symfony API base URL
      },
    };
    ```

4. **Add Environment Variables**

    Create a `.env` file in the project root and add your Google Places API key:

    ```env
    GOOGLE_PLACES_API_KEY=your_api_key_here
    ```

5. **Run the development server**

    Start the Nuxt development server:

    ```bash
    npm run dev
    ```

    The application should now be running at `http://localhost:3000`.

## Project Structure

### Backend

- `src/Entity/`: Contains the entity classes such as `User`, `Transaction`, and `Location`.
- `src/Controller/`: Contains the controller classes such as `TransactionController`.
- `src/Service/`: Contains the service classes such as `GooglePlacesService`.
- `config/services.yaml`: Configuration file for services.

### Frontend

- `pages/`: Contains the page components such as `login.vue` and `payments.vue`.
- `components/`: Contains reusable components such as `LocationModal.vue`.
- `nuxt.config.js`: Configuration file for Nuxt.js.
- `.env`: Environment variables for the project.

## Usage

### Login

Navigate to `/login` and enter your credentials to log in.

### View Payments

After logging in, you will be redirected to the payments page where you can see your transactions.

### Locate Transaction

Click the "Locate" button next to a transaction to open the modal and select a location.

## Contributing

If you wish to contribute to the project, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add new feature'`).
5. Push to the branch (`git push origin feature-branch`).
6. Open a pull request.

## License

This project is licensed under the MIT License. See the LICENSE file for details.
