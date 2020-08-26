# Simple PHP Carport Door Controller
Credits go to [Raspberry Pi Garage Door Opener](https://www.instructables.com/id/Raspberry-Pi-Garage-Door-Opener/).

## Usage
1. Configure `carportopener` to execute at system start to ensure GPIO pins are configured correctly.

2. Invoke GET requests through your device or browser.

    `localhost/?trigger`

## Supported Request types
- *trigger*: Equivalent to pressing a carport remote button. Will open/close/stop the door, depending on context.
- *status*: Returns 1 if the door will be closed.
- *close_carport*: Attempts to close the carport door. If door is closed, request will be ignored.
- *open_carport*: Opens the carport door if closed, otherwise request will be ignored.

## License
[![Creative Commons Licence](https://i.creativecommons.org/l/by-nc/4.0/88x31.png)](http://creativecommons.org/licenses/by-nc/4.0/)
