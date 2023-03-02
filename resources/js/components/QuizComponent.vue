<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Online Examination 
            <span class="float-right">{{ questionIndex }}/{{ questions.length }}</span>
          </div>
          <div class="card-body">
            <span class="float-right" style="color:red;">{{ time }}</span>
            <div v-for="(question,index) in questions">
              <div v-show="index === questionIndex">
                {{ question.question }}
                <ol>
                  <li v-for="choice in question.answers">
                    <label for="answer">
                    
                      <input type="radio"
                        :name="index"
                        :value="choice.is_correct==true?true:choice.answer"
                        v-model="userResponses[index]"
                        @click="options();postUserOption()"

                      >
                      {{ choice.answer }}
                    </label>
                  </li>
                </ol>
              </div>
              
            </div>
            <div v-if="questionIndex != questions.length">
              <button v-if="questionIndex=0" class="btn btn-success" @click="prev">pre</button>
              <button class="btn btn-success" @click="next">next</button>
            </div>
            <div v-else>
              <p>
                <center>
                You got: {{ score() }}/{{ questions.length }}
                </center>
              </p>
            </div>
              
          </div>
        </div>
      </div>
    </div>
    
  </div>
</template>


<script>
  export default {
    props:['quizid','quizQuestions','hasQuizPlayed','times',],
    // then assign the props to data 
    data(){
      return {
        questions:this.quizQuestions,
        questionIndex:0,
        userResponses:Array(this.quizQuestions.length).fill(false),
        currentQuestion:0,
        currentAnswer:0,
        quizId:this.quizid,
        clock:moment(this.times*60*1000)
        
      }
    },
    mounted() {
          setInterval(()=>{
            this.clock=moment(this.clock.substract(1,'seconds'))
          },1000);
    },
    computed:{
      time:function(){
        let minsec = this.clock.format('mm:ss')
        if(minsec == '00:00'){
          alert('TimeOut!');
          window.location.reload();
        }
        return minsec;

      }
    },
    methods:{
      next(){
        this.questionIndex++
      },
      prev(){
        this.questionIndex--
      },
      options(question,answer){
        this.currentAnswer = answer,
        this.currentQuestion = question
      },
      score(){
        return this.userResponses.filter((val)=>{
          return val===true;
        }).length
      },

      // below method is connected to postQuiz in ExamController 
      postUserOption(){
        // alert('ok');

        // send axios post request 
        axios.post('/quiz/user/create',{
          answerId:this.currentAnswer,
          questionId:this.currentQuestion,
          quizId:this.quizId
        }).then((response)=>{
          console.log(response)
        }).catch((error)=>{
          alert("Error!");
        })
      }
    }
  }
</script>
