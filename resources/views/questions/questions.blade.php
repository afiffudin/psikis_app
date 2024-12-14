  <!-- Table -->
  <div class="table-container">
                <h4 class="mb-4">List of Questions</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Question Answer</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $index => $question)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $question->title }}</td>
                                    <td>{{ $question->answer }}</td>
                                    <td>{{ $question->content }}</td>
                                    <td>
                                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
