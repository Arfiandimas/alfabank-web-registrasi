
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <h3>Learn More <span>About Us</span></h3>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              {{ $artikel_kiri }}
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              {{ $artikel_kanan }}
           </p>
           <p>{{ $berdiri_sejak }}</p>

           cara 1
            </br>
           @for($i=0 ;$i<3; $i = $i+1)
            {{$program_kursus[$i]}}
           @endfor

           
          </br>
            cara 2
           {{$program_kursus[0]}}
           {{$program_kursus[1]}}
           {{$program_kursus[2]}}
            </br> 
           cara 3 
            @foreach($program_kursus as $element)
              <span class="badge badge-primary badge-pill">{{$element}}</span>
            @endforeach
            </br>


            {{-- ini komentar dan tidak akan tampil --}}

            cara 4 : menampilkan data dari tabel program kursus dalam database
            @foreach($data_program_kursus as $program)
              <span class="badge badge-danger badge-pill">{{ $program->nama }} </span>
            @endforeach
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
