    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.vote-form').forEach(form => {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();

                const form = e.currentTarget;
                const postId = form.dataset.postId;
                const value = form.querySelector('input[name="value"]').value;
                const url = form.action;

                const formData = new FormData();
                formData.append('value', value);

                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                        },
                        body: formData,
                    });

                    if (response.status === 401) {
                        // meaning unautorhized - hay que redirigir manualmente
                        alert('Debes iniciar sesión para votar.');
                        window.location.href = '/login';
                        return;
                    }

                    const data = await response.json();

                    const ratingSpan = document.querySelector(`.post-rating[data-post-id="${postId}"]`);
                    if (ratingSpan && data.newVoteCount !== undefined) {
                        ratingSpan.textContent = data.newVoteCount;
                        ratingSpan.classList.remove('text-green-500', 'text-red-500', 'text-gray-400');
                        if (data.newVoteCount > 0) ratingSpan.classList.add('text-green-500');
                        else if (data.newVoteCount < 0) ratingSpan.classList.add('text-red-500');
                        else ratingSpan.classList.add('text-gray-400');
                    }

                    const postForms = document.querySelectorAll(`.vote-form[data-post-id="${postId}"]`);
                    postForms.forEach(f => {
                        const btn = f.querySelector('button');
                        btn.classList.remove('text-green-600', 'text-red-700', 'font-bold');
                        btn.classList.add('text-gray-400');
                    });

                    const currentUserVote = data.currentUserVote;
                    postForms.forEach(f => {
                        const input = f.querySelector('input[name="value"]');
                        const btn = f.querySelector('button'); 

                        const value = parseInt(input.value);
                        if (currentUserVote === value) {
                            btn.classList.remove('text-gray-400');
                            if (value === 1) {
                                btn.classList.add('text-green-600', 'font-bold');
                            } else if (value === -1) {
                                btn.classList.add('text-red-700', 'font-bold');
                            }
                        }
                    });
                } catch (error) {
                    console.error(error);
                    alert('error en la conexion');
                }
            });
        });
    });
