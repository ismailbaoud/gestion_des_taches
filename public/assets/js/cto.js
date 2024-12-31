// Tab Navigation
function showTab(tabName) {
    document.querySelectorAll('.tab-content').forEach(tab => tab.classList.add('hidden'));
    document.getElementById(tabName + '-section').classList.remove('hidden');
    
    // Update active nav link
    document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
    event.target.classList.add('active');

    // Initialize charts when dashboard tab is shown
    if (tabName === 'dashboard') {
        initializeCharts();
    }
}

// Initialize Charts Function
function initializeCharts() {
    // Project Progress Chart
    const progressCtx = document.getElementById('projectProgressChart')?.getContext('2d');
    if (progressCtx) {
        new Chart(progressCtx, {
            type: 'bar',
            data: {
                labels: ['Project A', 'Project B', 'Project C', 'Project D', 'Project E'],
                datasets: [{
                    label: 'Progress (%)',
                    data: [75, 60, 90, 30, 45],
                    backgroundColor: '#3B82F6',
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Project Progress Overview'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: 'Completion Percentage'
                        }
                    }
                }
            }
        });
    }

    // Resource Allocation Chart
    const resourceCtx = document.getElementById('resourceAllocationChart')?.getContext('2d');
    if (resourceCtx) {
        new Chart(resourceCtx, {
            type: 'doughnut',
            data: {
                labels: ['Development', 'Design', 'Testing', 'Management', 'Infrastructure'],
                datasets: [{
                    data: [40, 20, 15, 15, 10],
                    backgroundColor: [
                        '#3B82F6', // Blue
                        '#10B981', // Green
                        '#F59E0B', // Yellow
                        '#EF4444', // Red
                        '#8B5CF6'  // Purple
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Resource Allocation'
                    }
                },
                cutout: '60%'
            }
        });
    }
}

// Modal Management
function showModal(modalName) {
    document.getElementById(modalName + 'Modal').classList.remove('hidden');
}

function hideModal(modalName) {
    document.getElementById(modalName + 'Modal').classList.add('hidden');
}

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize charts if dashboard is active
    if (!document.getElementById('dashboard-section')?.classList.contains('hidden')) {
        initializeCharts();
    }

    // Close modals when clicking outside
    window.addEventListener('click', (e) => {
        document.querySelectorAll('.modal').forEach(modal => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });

    // Prevent modal close when clicking inside
    document.querySelectorAll('.modal > div').forEach(modalContent => {
        modalContent.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    });
});
