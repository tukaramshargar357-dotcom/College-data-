<? php

?>
                <ul class="nav nav-pills border border-secondary text-bg-dark p-3">
                    <li class="nav-item">
                        <a class="nav-link  rounded-pill text-light" aria-current="page" href="../main.php">HOME</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link rounded-pill mb-2 text-light" href="../student/table.php">Student</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link rounded-pill mb-2 text-light" href="../staf/table.php">Staff</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link rounded-pill mb-2 text-light" href="../classes/table.php">Classes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link rounded-pill mb-2 text-light" href="../courses/table.php">Courses</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link rounded-pill mb-2 text-light" href="../departments/table.php">Departments</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link rounded-pill mb-2 text-light" href="../designation/table.php">Designation</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link rounded-pill mb-2 text-light" href="../enrollment/table.php">Enrollment</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link rounded-pill mb-2 text-light" href="../exam/table.php">Exam</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link rounded-pill mb-2 text-light" href="../marks/table.php">Marks</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link rounded-pill mb-2 text-light" href="../subjects/table.php">Subjects</a>
                    </li>
                </ul>

<script>
    const links = document.querySelectorAll('.nav-link');

    links.forEach(link => {
        link.addEventListener('click', function () {
            localStorage.setItem('activeLink', this.getAttribute('href'));
        });

        if (link.getAttribute('href') === localStorage.getItem('activeLink')) {
            link.classList.add('active');
        }
    });
</script>