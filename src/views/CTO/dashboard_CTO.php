<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require_once __DIR__ . "/../../controullers/CTO/category_add.php";
require_once __DIR__ . "/../../controullers/CTO/projet.php";
require_once __DIR__ . "/../../controullers/CTO/manage_equipe.php";


?>
<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProjectHub - CTO Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@shopify/draggable@1.0.0-beta.12/lib/draggable.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: {
                            bg: '#1a1a1a',
                            card: '#2d2d2d',
                            text: '#ffffff'
                        }
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            .nav-link {
                @apply text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors;
            }
            .nav-link.active {
                @apply text-blue-600 dark:text-blue-400;
            }
            /* Dark mode styles */
            .dark .bg-white {
                @apply bg-dark-card text-gray-100;
            }
            .dark .text-gray-600 {
                @apply text-gray-300;
            }
            .dark .text-gray-500 {
                @apply text-gray-400;
            }
            .dark .border {
                @apply border-gray-600;
            }
            .dark .hover\:bg-gray-50:hover {
                @apply hover:bg-gray-700;
            }
        }
    </style>
    <script src="/public/assets/js/theme.js"></script>
    <script src="/public/assets/js/cto.js"></script>
</head>
<body class="bg-gray-50 dark:bg-dark-bg min-h-screen transition-colors duration-200">
    <!-- Navigation Bar -->
    <nav class="bg-white dark:bg-dark-card shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="#" class="text-2xl font-bold text-blue-600">ProjectHub</a>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                        <!-- Dark SVG Icon -->
                        <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <!-- Light SVG Icon -->
                        <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                        </svg>
                    </button>
                    <div class="flex items-center space-x-4">
                        <!-- Dark Mode Toggle -->
                        <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                            <!-- Dark SVG Icon -->
                            <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <!-- Light SVG Icon -->
                            <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
                            </svg>
                        </button>
                        <div class="flex space-x-4">
                            <a href="#" class="nav-link active" onclick="showTab('projects')">Projects</a>
                            <a href="#" class="nav-link" onclick="showTab('team')">Team</a>
                            <a href="#" class="nav-link" onclick="showTab('assign-tasks')">Assign Tasks</a>
                            <a href="#" class="nav-link" onclick="showTab('categories')">Categories</a>
                            <a href="../../controullers/logOut.php" class="nav-link">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Projects Section -->
    
        <div id="projects-section" class="tab-content">
            <h1 class="text-4xl font-bold text-center mb-8">project management</h1>
            <div class="flex justify-end mb-6">
                <button onclick="showModal('createProject')" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Create New Project
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sample Project Cards -->
                <?php 
                      $project = new _projet();
                      $projets = $project->display_project();
                      foreach ($projets as $projet) :
                  ?>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-2"><?=$projet["title"]?></h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4"><?=$projet["description"]?></p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500 dark:text-gray-400"><?=$projet["status"]?></span>
                        <span class="text-sm text-gray-500 dark:text-gray-400"><?=$projet["visibility"]?></span>
                    </div>
                    <div class="mt-4 flex justify-end space-x-2">
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                        <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Delete</button>
                    </div>
                </div>
                <?php endforeach?>
            </div>
        </div>
       

        <!-- Team Section -->
        <div id="team-section" class="tab-content hidden">
            <h1 class="text-4xl font-bold text-center mb-8">Team Management</h1>
            <div class="flex justify-end mb-6">
                <button onclick="showModal('addMember')" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Add Team Member
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sample Team Member Card -->
            <?php
                            $res = new equipe_handling();
                            $members = $res->_display();
                            foreach ($members as $member): ?>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
                            MR
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold"><?=$member["fullname"]?></h3>
                            
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 mb-4"><?=$member["email"]?></p>
                    <div class="flex justify-end space-x-2">
                        <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                        <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Remove</button>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <!-- Assign Tasks Section -->
        <div id="assign-tasks-section" class="tab-content hidden">
            <h1 class="text-4xl font-bold text-center mb-8">Task Assignment</h1>
            <div class="flex justify-end mb-6">
                <button onclick="showModal('assignTask')" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Assign New Task
                </button>
            </div>
            <div class="grid grid-cols-1 gap-6">
                <!-- Task Assignment List -->
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b dark:border-gray-700">
                                    <th class="text-left py-3 px-4">Task</th>
                                    <th class="text-left py-3 px-4">Project</th>
                                    <th class="text-left py-3 px-4">Assigned To</th>
                                    <th class="text-left py-3 px-4">Due Date</th>
                                    <th class="text-left py-3 px-4">Status</th>
                                    <th class="text-left py-3 px-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Section -->
        <div id="categories-section" class="tab-content hidden">
            <h1 class="text-4xl font-bold text-center mb-8">Categories Management</h1>
            <div class="flex justify-end mb-6">
                <button onclick="showModal('createCategory')" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Create Category
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sample Category Card -->
                 <?php 
                      
                            $categories = category_handling::display();
                            foreach ($categories as $category) :
                        ?>
                <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-2"><?= $category["name"] ?></h3>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-blue-600 dark:text-blue-400">5 taches</span>
                        <div class="flex space-x-2">
                            <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">Edit</button>
                            <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">Delete</button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

    <!-- Modals -->
    <!-- Create Project Modal -->
    <div id="createProjectModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-dark-card rounded-lg p-6 w-full max-w-md">
            <h3 class="text-xl font-bold mb-4">Create New Project</h3>
            <form action="../../controullers/CTO/projet.php" method="post" id="createProjectForm" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1" for="projectName">Project Name</label>
                    <input type="text" id="projectName" name="name" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="projectDescription">Description</label>
                    <textarea id="projectDescription" name="description" rows="3" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="projectDescription">visibility</label>
                    <select id="taskAssignee" name="visibility" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                        <option value="">Select visibility</option>
                        <option value="private">private</option>
                        <option value="public">public</option>

                    </select>
                </div>
                
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('createProject')"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100">
                        Cancel
                    </button>
                    <button type="submit" name="btn_project"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Create Project
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Member Modal -->
    <div id="addMemberModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-dark-card rounded-lg p-6 w-full max-w-md">
            <h3 class="text-xl font-bold mb-4">Add Team Member</h3>
            <form action="../../controullers/CTO/manage_equipe.php" method="post" id="addMemberForm" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1" for="memberRole">Select Member</label>
              
                    <select id="memberRole" name="role" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                        <option value="">Select a role</option>
                        <?php 
                        try {
                            $res = new equipe_handling();
                            $members = $res->display();
                            foreach ($members as $member) {
                                
                                echo '<option value="' . htmlspecialchars($member['member_id']) . '">' . 
                                     htmlspecialchars($member['fullname']) . 
                                     '</option>';
                            }
                        } catch (Exception $e) {
                            error_log("Error loading categories: " . $e->getMessage());
                        }
                        ?>
                    </select>
                    
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('addMember')"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100">
                        Cancel
                    </button>
                    <button type="submit" name="btn_equipe"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Add Member
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Assign Task Modal -->
    <div id="assignTaskModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-dark-card rounded-lg p-6 w-full max-w-md">
            <h3 class="text-xl font-bold mb-4">Assign New Task</h3>
            <form id="assignTaskForm" class="space-y-4" method="post" action="/api/tasks/assign">
                <div>
                    <label class="block text-sm font-medium mb-1" for="taskTitle">Task Title</label>
                    <input type="text" id="taskTitle" name="title" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="taskDescription">Description</label>
                    <textarea id="taskDescription" name="description" rows="3" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="taskProject">Project</label>
                    <select id="taskProject" name="project_id" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                        <option value="">Select a project</option>
                        <?php foreach ($projects as $project): ?>
                            <option value="<?= htmlspecialchars($project['id']) ?>">
                                <?= htmlspecialchars($project['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="taskAssignee">Assign To</label>
                    <select id="taskAssignee" name="assignee_id" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                        <option value="">Select team member</option>
                        <?php foreach ($team_members as $member): ?>
                            <option value="<?= htmlspecialchars($member['id']) ?>">
                                <?= htmlspecialchars($member['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="taskPriority">Priority</label>
                    <select id="taskPriority" name="priority" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="projectCategory">Category</label>
                    <select id="projectCategory" name="category" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                        <option value="">Select a category</option>
                        <?php 
                        try {
                            $categories = category_handling::display();
                            foreach ($categories as $category) {
                                echo '<option value="' . htmlspecialchars($category['category_id']) . '">' . 
                                     htmlspecialchars($category['name']) . 
                                     '</option>';
                            }
                        } catch (Exception $e) {
                            error_log("Error loading categories: " . $e->getMessage());
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="taskDueDate">Due Date</label>
                    <input type="date" id="taskDueDate" name="due_date" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                </div>
                <!-- CSRF Token -->
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('assignTask')"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Assign Task
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Create Category Modal -->
    <div id="createCategoryModal" class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-dark-card rounded-lg p-6 w-full max-w-md">
            <h3 class="text-xl font-bold mb-4">Create Category</h3>
            <form action="../../controullers/CTO/category_add.php" method="post" id="createCategoryForm" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1" for="categoryName">Category Name</label>
                    <input type="text" id="categoryName" name="name" required
                        class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="hideModal('createCategory')"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100">
                        Cancel
                    </button>
                    <button type="submit" name="btn_category" value="category"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="../../public/assets/js/main.js"></script>
    <script src="../../public/assets/js/navigation.js"></script>

    <script>
        // Initialize drag and drop
        document.addEventListener('DOMContentLoaded', () => {
            const containers = document.querySelectorAll('.kanban-column');
            
            if (typeof Draggable !== 'undefined') {
                const sortable = new Draggable.Sortable(containers, {
                    draggable: '.task-card',
                    handle: '.task-card',
                    mirror: {
                        constrainDimensions: true,
                    }
                });

                sortable.on('drag:start', (evt) => {
                    evt.source.style.opacity = '0.5';
                });

                sortable.on('drag:stop', (evt) => {
                    evt.source.style.opacity = '1';
                });

                sortable.on('sortable:stop', (evt) => {
                    const task = evt.data.dragEvent.data.source;
                    const newStatus = evt.data.newContainer.dataset.status;
                    
                    // Update task styling based on new status
                    updateTaskStyle(task, newStatus);
                });
            }
        });

        // Update task card styling based on status
        function updateTaskStyle(taskElement, status) {
            const statusBadge = taskElement.querySelector('.status-badge');
            if (statusBadge) {
                statusBadge.className = 'status-badge px-2 py-1 rounded text-sm';
                switch (status) {
                    case 'todo':
                        statusBadge.classList.add('bg-gray-100', 'text-gray-600');
                        statusBadge.textContent = 'Todo';
                        break;
                    case 'in-progress':
                        statusBadge.classList.add('bg-yellow-100', 'text-yellow-600');
                        statusBadge.textContent = 'In Progress';
                        break;
                    case 'completed':
                        statusBadge.classList.add('bg-green-100', 'text-green-600');
                        statusBadge.textContent = 'Completed';
                        break;
                }
            }
        }

        // Tab switching functionality
        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });
            document.getElementById(tabName + '-section').classList.remove('hidden');
            
            // Update active tab styling
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            event.target.classList.add('active');
        }

        // ... rest of your existing JavaScript ...
    </script>
</body>
</html>
