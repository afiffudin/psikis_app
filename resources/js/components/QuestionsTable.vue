<template>
  <div>
    <table class="table table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Pertanyaan</th>
          <th>Opsi A</th>
          <th>Opsi B</th>
          <th>Opsi C</th>
          <th>Opsi D</th>
          <th>Jawaban Benar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(question, index) in questions" :key="index">
          <td>{{ question.id }}</td>
          <td>{{ question.question }}</td>
          <td>{{ question.option_a }}</td>
          <td>{{ question.option_b }}</td>
          <td>{{ question.option_c }}</td>
          <td>{{ question.option_d }}</td>
          <td>{{ question.correct_answer }}</td>
          <td>
            <a :href="`/questions/${question.id}/edit`" class="btn btn-sm btn-warning">Edit</a>
            <button @click="deleteQuestion(question.id)" class="btn btn-sm btn-danger">Hapus</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      questions: [],
    };
  },
  created() {
    this.fetchQuestions();
  },
  methods: {
    fetchQuestions() {
      axios.get('/api/questions')
        .then(response => {
          this.questions = response.data;
        })
        .catch(error => {
          console.error("Error fetching questions:", error);
        });
    },
    deleteQuestion(id) {
      if (confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?')) {
        axios.delete(`/api/questions/${id}`)
          .then(() => {
            this.fetchQuestions();
          })
          .catch(error => {
            console.error("Error deleting question:", error);
          });
      }
    },
  },
};
</script>

<style scoped>
.table th, .table td {
  vertical-align: middle;
  text-align: center;
}
.btn-sm {
  margin-right: 5px;
}
</style>
