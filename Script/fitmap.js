// Select all path elements within the SVG
const svg_paths = svg.querySelectorAll('path');
const svg_groups = svg.querySelectorAll('g');

const fitPathIntoView = (path) => {
  console.log(path)
  if (path.id === "Philippines") {
    return;
  }
  pathBoundingBox = path.getBBox();
  const padding = 300; // Adjust the padding value as needed

  // Calculate the aspect ratio of the container and the path
  const containerAspectRatio = containerMap.clientWidth / containerMap.clientHeight;
  const pathAspectRatio = pathBoundingBox.width / pathBoundingBox.height;

  // Calculate the viewBox dimensions based on the aspect ratio
  let viewBoxWidth, viewBoxHeight;
  if (containerAspectRatio > pathAspectRatio) {
    // Container is wider, so fit the height of the path to the container height
    viewBoxHeight = pathBoundingBox.height + 2 * padding;
    viewBoxWidth = viewBoxHeight * containerAspectRatio;
  } else {
    // Container is taller, so fit the width of the path to the container width
    viewBoxWidth = pathBoundingBox.width + 2 * padding;
    viewBoxHeight = viewBoxWidth / containerAspectRatio;
  }

  // Calculate the viewBox position to center the path
  const viewBoxX = pathBoundingBox.x - (viewBoxWidth - pathBoundingBox.width) / 2;
  const viewBoxY = pathBoundingBox.y - (viewBoxHeight - pathBoundingBox.height) / 2;

  // Set the new viewBox for the SVG
  svg.setAttribute('viewBox', `${viewBoxX} ${viewBoxY} ${viewBoxWidth} ${viewBoxHeight}`);
};


// Attach click event listener to each path
svg_paths.forEach(path => {
  path.addEventListener('click', (e) => {
    // Zoom into the clicked path
    fitPathIntoView(e.target);
    // Clear previous styles from all paths and groups
    svg_paths.forEach(p => {
      p.style.fill = '';
    });
    svg_groups.forEach(group => {
      group.style.fill = '';
    });

    // Update the button label with the name of the clicked path
    const button = document.querySelector('.selectmap');
    const selectedValue = e.target.id.replace(/-/g, ' ');
    button.textContent = selectedValue;
    updateSelectMap(button.textContent);
    // Apply styles to the clicked path
    e.target.style.fill = '#a424ff'; // Black fill color
    e.target.style.stroke = '#fff'; // White stroke color

    isReset = false; // Map is no longer in reset state

    // AJAX request without refreshing the page
    const formData = new FormData();
    formData.append('selectedValue', selectedValue);
    fetch('index.php', {
      method: 'POST',
      body: formData
    })
      .then(response => {
        if (response.ok) {
          console.log('AJAX request successful');
        } else {
          console.error('AJAX request failed');
        }
      })
      .catch(error => {
        console.error('AJAX request failed:', error);
      });
  });
});
