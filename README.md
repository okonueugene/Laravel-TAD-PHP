# TAD-PHP Integration with Laravel

This project integrates TAD-PHP library with Laravel to connect and manage ZKTeco Time Attendance Devices (fingerprint biometric devices) in a web application.

## Overview

TAD-PHP is a library that provides PHP connectivity with ZKTeco Time Attendance Devices. This integration allows you to:

- Connect to ZKTeco devices over the network
- Retrieve attendance logs from the devices
- Manage users, fingerprints, and device settings
- Synchronize attendance data with your application database

## Prerequisites

Before you begin, ensure you have:

- PHP 7.4+ (PHP 8.0+ requires the compatibility patch included in this project)
- Laravel 8.0+
- A ZKTeco Time Attendance Device connected to your network
- SOAP PHP extension enabled
- Sockets PHP extension enabled

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/attendance-system.git
   cd attendance-system
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Copy environment file and update configuration:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure your TAD device settings in `.env`:
   ```
   TAD_IP=192.168.0.1
   TAD_INTERNAL_ID=1
   TAD_COM_KEY=0
   TAD_DESCRIPTION="Attendance Device"
   TAD_SOAP_PORT=80
   TAD_UDP_PORT=4370
   TAD_ENCODING=utf-8
   ```

5. Run migrations:
   ```bash
   php artisan migrate
   ```

6. Serve the application:
   ```bash
   php artisan serve
   ```

## Features

### Device Connection
- Test device connectivity
- View device information (date, time, status, etc.)

### Attendance Management
- View attendance logs from the device
- Paginated display of attendance records
- Filter records by date, user, or status
- Export attendance data to CSV/Excel

### User Management
- View users registered on the device
- Add/Edit/Delete users from the device
- Manage user access rights and verification methods

## Troubleshooting

### Common Issues

#### Connection Errors
If you're having trouble connecting to the device:
- Ensure the device is powered on and connected to the network
- Verify the IP address in your `.env` file is correct
- Check that the SOAP and UDP ports are not blocked by a firewall
- Make sure the COM key matches the one set on the device


#### SOAP Extension Missing
If you get errors about missing SOAP functionality:
- Ubuntu/Debian: `sudo apt-get install php-soap`
- macOS: `brew install php`
- Windows: Enable the extension in your php.ini file

## Code Structure

- **app/Http/Controllers/Admin/AttendanceDeviceController.php**: Main controller for attendance device operations
- **app/Providers/TADServiceProvider.php**: Service provider to integrate TAD-PHP with Laravel
- **config/tad.php**: Configuration file for TAD device settings
- **resources/views/admin/attendance/index.blade.php**: View for displaying attendance records

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## Credits

- [TAD-PHP](https://github.com/cobisja/tad-php) by Cobis, Jorge A.
- [Laravel](https://laravel.com/)
- [ZKTeco](https://www.zkteco.com/)

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.