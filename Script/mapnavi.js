const svg = document.getElementById('svg_default');
const containerMap = document.querySelector('.main-map');
const defaultViewBox = svg.getAttribute('viewBox');
const zoomFactor = 1.5;
const sensitivityFactor = 5;
const minZoomFactor = 0.1;
const maxZoomFactor = 1;
let isReset = true;
let initialX, initialY, initialViewBox, isDragging = false;

const applyZoom = (isZoomIn) => {
  const currentViewBox = svg.getAttribute('viewBox').split(' ');
  let [x, y, width, height] = currentViewBox.map(parseFloat);
  const centerX = x + width / 2;
  const centerY = y + height / 2;
  const newWidth = isZoomIn ? width / zoomFactor : width * zoomFactor;
  const newHeight = isZoomIn ? height / zoomFactor : height * zoomFactor;
  const newX = centerX - newWidth / 2;
  const newY = centerY - newHeight / 2;

  if (
    newWidth >= parseFloat(defaultViewBox.split(' ')[2]) * minZoomFactor &&
    newWidth <= parseFloat(defaultViewBox.split(' ')[2]) * maxZoomFactor &&
    newHeight >= parseFloat(defaultViewBox.split(' ')[3]) * minZoomFactor &&
    newHeight <= parseFloat(defaultViewBox.split(' ')[3]) * maxZoomFactor
  ) {
    svg.setAttribute('viewBox', `${newX} ${newY} ${newWidth} ${newHeight}`);
    isReset = false;
  } else if (!isZoomIn && newWidth >= parseFloat(defaultViewBox.split(' ')[2]) * maxZoomFactor) {
    svg.setAttribute('viewBox', `0 0 ${defaultViewBox.split(' ')[2]} ${defaultViewBox.split(' ')[3]}`);
    isReset = true;
  }
};

const mapNavigationSelected = (action) => {
  switch (action) {
    case 'zoom-in':
      applyZoom(true);
      break;
    case 'zoom-out':
      applyZoom(false);
      break;
    case 'reset':
      svg.setAttribute('viewBox', defaultViewBox);
      isReset = true;   
      break;
  }
};

svg.addEventListener('wheel', function (e) {
  if (!e.target.closest('.modal-choice') && !e.target.closest('.compliment') && !e.target.closest('.maplist')) {
    if (e.target.closest('.accordion-body') || e.target.closest('main_map')) return;
    e.preventDefault();
    applyZoom(e.deltaY < 0); // Zoom in on wheel up, zoom out on wheel down
  }
}, { passive: false });

svg.addEventListener('mousedown', (e) => {
  if (!isReset) {
    initialX = e.clientX;
    initialY = e.clientY;
    initialViewBox = svg.getAttribute('viewBox');
    isDragging = true;
  }
});

svg.addEventListener('mousemove', (e) => {
  if (isDragging) {
    const currentX = e.clientX;
    const currentY = e.clientY;
    const deltaX = (currentX - initialX) * sensitivityFactor;
    const deltaY = (currentY - initialY) * sensitivityFactor;
    const [x, y, width, height] = initialViewBox.split(' ').map(parseFloat);
    const maxDeltaX = Math.max(0, 3653 - width);
    const maxDeltaY = Math.max(0, 6105 - height);
    const newX = Math.max(0, Math.min(x - deltaX, maxDeltaX));
    const newY = Math.max(0, Math.min(y - deltaY, maxDeltaY));
    svg.setAttribute('viewBox', `${newX} ${newY} ${width} ${height}`);
  }
});

svg.addEventListener('mouseup', () => {
  isDragging = false;
});

containerMap.addEventListener('mouseleave', () => {
  isDragging = false;
});
