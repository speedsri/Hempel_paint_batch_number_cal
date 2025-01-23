# Hempel Paint Batch Expiry Calculator

## Overview
This web application helps users calculate the expiry date of Hempel paint products based on their unique 9-digit batch number.

## Features
- Decodes Hempel batch number components
- Calculates paint expiry date
- Supports multiple shelf life options (2, 3, 5 years)
- User-friendly interface
- Responsive design
![myimage-alt-tag]([url-to-image](https://github.com/speedsri/Hempel_paint_batch_number_cal/blob/main/imag_2.png) 
## Prerequisites
- Web server with PHP support (recommended)
- Modern web browser (Chrome, Firefox, Safari, Edge)

## Installation

### Local Setup
1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/hempel-paint-expiry-calculator.git
   ```

2. Move files to web server directory
   - For XAMPP: `htdocs/hempel-calculator/`
   - For WAMP: `www/hempel-calculator/`
   - For MAMP: `htdocs/hempel-calculator/`

3. Open in web browser:
   `http://localhost/hempel-calculator/`

### Web Hosting
1. Upload all files to your web hosting account
2. Ensure PHP is enabled
3. Access through your domain

## User Manual

### Batch Number Format
- **Total Length:** 9 digits
- **First 2 digits:** Production location code
- **3rd digit:** Last digit of production year
- **4-5th digits:** Production month
- **Last 4 digits:** Unique batch identifier

### How to Use
1. Enter complete 9-digit batch number
   - Example: `428090744`
2. Select shelf life (2/3/5 years)
3. Click "Calculate Expiry Date"

### Interpretation of Results
- Shows production location
- Displays production date
- Indicates expiry date
- Highlights product's current shelf life status

## Troubleshooting
- Ensure batch number is exactly 9 digits
- Check internet connection
- Verify browser compatibility

## Limitations
- Relies on basic batch number format
- Actual shelf life may vary
- Always consult product packaging

## Contributing
1. Fork repository
2. Create feature branch
3. Commit changes
4. Push to branch
5. Create pull request

## License
[Specify your license, e.g., MIT License]

## Contact
[Your contact information or support email]
