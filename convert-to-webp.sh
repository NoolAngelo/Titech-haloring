#!/bin/bash

# Check if cwebp command exists
if ! command -v cwebp &> /dev/null; then
    echo "Error: cwebp is not installed."
    echo "You can install it using: brew install webp (on macOS)"
    echo "Or sudo apt-get install webp (on Ubuntu)"
    exit 1
fi

# Function to convert an image to WebP
convert_to_webp() {
    local input_file=$1
    local filename=$(basename -- "$input_file")
    local name="${filename%.*}"
    local output_file="img/webp/${name}.webp"
    
    # Create directory if it doesn't exist
    mkdir -p img/webp
    
    # Check if it's a PNG (might have transparency)
    if [[ $input_file == *.png ]]; then
        echo "Converting PNG: $input_file to WebP with lossless compression"
        cwebp -lossless "$input_file" -o "$output_file"
    else
        echo "Converting: $input_file to WebP with quality 85"
        cwebp -q 85 "$input_file" -o "$output_file"
    fi
    
    echo "Created: $output_file"
}

# Process all images in img directory
echo "Starting WebP conversion..."
for file in img/*.png img/*.jpg img/*.jpeg; do
    # Check if file exists (to handle case when no files match pattern)
    if [[ -f "$file" ]]; then
        convert_to_webp "$file"
    fi
done

echo "WebP conversion complete!"
echo "Remember to update your HTML to use the new WebP images with a fallback:"
echo "<picture>"
echo '  <source srcset="img/webp/image.webp" type="image/webp">'
echo '  <img src="img/original-image.png" alt="Description">'
echo "</picture>" 