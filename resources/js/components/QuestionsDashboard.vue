<template>
    <div class="dashboard">
      <h1>Dashboard Questions</h1>
      <table v-if="questions.length > 0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Option A</th>
            <th>Option B</th>
            <th>Option C</th>
            <th>Option D</th>
            <th>Correct Answer</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="question in questions" :key="question.id">
            <td>{{ question.id }}</td>
            <td>{{ question.question }}</td>
            <td>{{ question.option_a }}</td>
            <td>{{ question.option_b }}</td>
            <td>{{ question.option_c }}</td>
            <td>{{ question.option_d }}</td>
            <td>{{ question.correct_answer }}</td>
          </tr>
        </tbody>
      </table>
      <p v-else>No questions available.</p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        questions: []
      };
    },
    mounted() {
      this.fetchQuestions();
    },
    methods: {
      async fetchQuestions() {
        try {
          const response = await fetch('http://127.0.0.1:8000/api/questions');
          const data = await response.json();
          this.questions = data;
        } catch (error) {
          console.error('Error fetching questions:', error);
        }
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  </style>
  