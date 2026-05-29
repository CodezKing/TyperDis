<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<!--Create post button-->
<button id="create-post-btn" class="bg-blue-200 text-white p-2 rounded">Create new post</button>


<div id="create-post-form" class="hidden fixed top-0 left-0 w-full h-full bg-gray-500 bg-opacity-50 justify-center items-center">
    <div class="bg-white p-6 rounded">
        <h3 class="text-xl mb-4">Create New Post</h3>

        <form id="create-post" action="javascript:void(0);" method="POST">
            <div class="mb-4">
                <label for="title" class="block">Title</label>
                <input type="text" id="title" name="title" class="w-full p-2 border" placeholder="Enter post title" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block">Content</label>
                <textarea id="content" name="content" class="w-full p-2 border" placeholder="Enter post content" required></textarea>
            </div>

            <input type="hidden" id="category_id" name="category_id" value="5"> <input type="hidden" id="author_id" name="author_id" value="{{ auth()->user()->id }}"> <div class="flex justify-between">
                <button type="button" onclick="closeCreatePostForm()" class="bg-gray-400 text-white p-2 rounded">Cancel</button>
                <button type="submit" class="bg-green-500 text-white p-2 rounded">Create Post</button>
            </div>
        </form>
    </div>
</div>

 <div class="mt-4 p-4 bg-white shadow rounded">
    <table id="posts-table" class="min-w-full border-collapse table-auto">
        <thead>
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Content</th>
                <th class="border px-4 py-2">Category</th>
                <th class="border px-4 py-2">Author</th>
                <th class="border px-4 py-2">Tags</th>
                <th class="border px-4 py-2">Actions</th>
                    </tr>
        </thead>
        <tbody id="post-container">
            <tr>
                <td colspan="7" class="text-center py-4">Loading posts...</td>
                </tr>
        </tbody>
    </table>
 </div>
</x-app-layout>

{{-- api calling methods using axios--}}
<script>

    // Fetch posts and render in a table
    document.addEventListener('DOMContentLoaded', function () {

        // GET method
        axios.get('/api/posts', {
            headers: {
                Authorization: `Bearer 4|T8q1Xi1rgtXobrIEvIeyZ3WYUgN1ebkjGuZZ01gSfc935bc3`  // Replace your token
            }
        })
        .then(response => {
            const posts = response.data.data;
            const postsContainer = document.getElementById('posts-container');

            postsContainer.innerHTML = posts.map((post, index) => `
                <tr>
                    <td class="border px-4 py-2">${index + 1}</td>
                    <td class="border px-4 py-2">${post.title}</td>
                    <td class="border px-4 py-2">${post.content}</td>
                    <td class="border px-4 py-2">${post.category.title}</td>
                    <td class="border px-4 py-2">${post.author.name}</td>
                    <td class="border px-4 py-2">${post.tags.map(tag => `<span>${tag.title}</span>`).join(', ')}</td>
                    <td class="border px-4 py-2">
                        <button class="bg-blue-500 text-white px-2 py-1 rounded" onclick="editPost(${post.id})">Edit</button>
                        <button class="bg-red-500 text-white px-2 py-1 rounded" onclick="deletePost(${post.id})">Delete</button>
                    </td>
                </tr>
            `).join('');
        })
        .catch(error => {
            console.error(error);
        });
    });

// Create Post button click event
document.getElementById('create-post-btn').addEventListener('click', function() {
    document.getElementById('create-post-form').classList.remove('hidden'); // Show the form
});

// Close Create Post Form
function closeCreatePostForm() {
    document.getElementById('create-post-form').classList.add('hidden'); // Hide the form
}

// Submit the form to create a post
document.getElementById('create-post').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    const title = document.getElementById('title').value;
    const content = document.getElementById('content').value;
    const categoryId = document.getElementById('category_id').value;
    const authorId = document.getElementById('author_id').value;

    if (title && content) {
        // POST method
        axios.post('/api/posts', {
            title: title,
            content: content,
            category_id: categoryId,
            author_id: authorId
        }, {
            headers: {
                Authorization: `Bearer 4|T8q1Xi1rgtXobrIEvIeyZ3WYUgN1ebkjGuZZ01gSfc935bc3`  // Replace your token
            }
        })
        .then(response => {
            alert('Post created successfully!');
            closeCreatePostForm(); // Close the form
            location.reload(); // Reload the page to fetch updated data
        })
        .catch(error => {
            console.error(error);
            alert('Failed to create the post. Please try again.');
        });
    } else {
        alert('Title and content cannot be empty.');
    }
});

    
    // Edit post function
function editPost(postId) {

    const newTitle = prompt("Enter the new title:");
    const newContent = prompt("Enter the new content:");

    if (newTitle && newContent) {
        // PUT method
        axios.put(`/api/posts/${postId}`, {
            title: newTitle,
            content: newContent
        }, {
            headers: {
                Authorization: `Bearer 4|T8q1Xi1rgtXobrIEvIeyZ3WYUgN1ebkjGuZZ01gSfc935bc3` // Replace your token
            }
        })
        .then(response => {
            alert('Post updated successfully!');
            location.reload(); // Reload the page to fetch updated data
        })
        .catch(error => {
            console.error(error);
            alert('Failed to update the post. Please try again.');
        });
    } else {
        alert('Title and content cannot be empty.');
    }
}


// Delete post function
function deletePost(postId) {

    if (confirm("Are you sure you want to delete this post?")) {
        // DELETE method
        axios.delete(`/api/posts/${postId}`, {
            headers: {
                Authorization: `Bearer 4|T8q1Xi1rgtXobrIEvIeyZ3WYUgN1ebkjGuZZ01gSfc935bc3`  // Replace your token
            }
        })
        .then(response => {
            alert('Post deleted successfully!');
            location.reload(); // Reload the page to fetch updated data
        })
        .catch(error => {
            console.error(error);
            alert('Failed to delete the post. Please try again.');
        });
    }
}


</script>

