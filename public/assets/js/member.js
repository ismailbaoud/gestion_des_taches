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
    // Task Status Chart
    const taskCtx = document.getElementById('taskStatusChart')?.getContext('2d');
    if (taskCtx) {
        new Chart(taskCtx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'In Progress', 'Pending', 'Overdue'],
                datasets: [{
                    data: [12, 8, 5, 2],
                    backgroundColor: [
                        '#10B981', // Green for Completed
                        '#3B82F6', // Blue for In Progress
                        '#F59E0B', // Yellow for Pending
                        '#EF4444'  // Red for Overdue
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
                        text: 'Task Status Overview'
                    }
                },
                cutout: '60%'
            }
        });
    }

    // Weekly Activity Chart
    const activityCtx = document.getElementById('weeklyActivityChart')?.getContext('2d');
    if (activityCtx) {
        new Chart(activityCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                datasets: [{
                    label: 'Tasks Completed',
                    data: [4, 6, 3, 5, 4],
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
                        text: 'Weekly Activity'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Tasks Completed'
                        }
                    }
                }
            }
        });
    }
}

// Task Management Functions
function markTaskComplete(taskId) {
    // Add your task completion logic here
    console.log('Marking task complete:', taskId);
}

function showTaskDetails(taskId) {
    // Add your task details display logic here
    console.log('Showing task details:', taskId);
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
