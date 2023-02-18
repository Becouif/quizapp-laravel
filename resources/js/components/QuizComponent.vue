<template>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Online Examination</div>

                  <div class="card-body">
                      <div v-for="(question,index) in questions">
                      {{ question }}
                        <li v-for="choice in answers">
                          <label for="">
                            <input type="radio">
                            {{ choice.answer }}
                          </label>
                        </li>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
  export default {
    props:['quizid','quizQuestions','hasQuizPlayed','times','answers'],
    // then assign the props to data 
    data(){
      return {
        questions:this.quizQuestions
      }
    },
      mounted() {
          console.log('Component mounted.')
      }
  }
</script>
