# Laravel my_organization_chart

This is a simple API built with Laravel to manage positions within an organization. It provides functionality for creating, reading, updating, deleting, searching, and sorting positions. The API also allows filtering positions based on their head (reports_to).

## Features

- **Create**: Add new positions.
- **Read**: Retrieve position details.
- **Update**: Modify existing positions.
- **Delete**: Remove positions.
- **Search**: Filter positions by name.
- **Sort**: Sort positions by their name in ascending or descending order.
- **Filter by head**: Filter positions by the `reports_to` field, which indicates the head.

## Installation

Follow the steps below to set up and run the project on your local machine.

### Requirements

- PHP 8.0 or higher
- Composer
- Laravel 10
- MySQL version 8

### Steps to Set Up

1. **Clone the Repository**
   ```bash
   git clone https://github.com/corbine0206/my_organization_chart.git
   cd my_organization_chart
