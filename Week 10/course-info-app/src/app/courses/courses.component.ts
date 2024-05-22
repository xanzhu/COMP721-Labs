import { Component, OnInit } from '@angular/core';
import { Course } from '../course';
import { COURSES } from '../test-course';

@Component({
  selector: 'app-courses',
  templateUrl: './courses.component.html',
  styleUrls: ['./courses.component.css'],
})
export class CoursesComponent implements OnInit {
  course: Course = {
    course_id: 1,
    course_title: 'Web Development',
    semester: 1,
    period: 'Wednesday 4-6 PM',
    lecturer: 'Dr. Jian Yu',
  };

  selectedCourse?: Course;
  onSelect(course: Course): void {
    this.selectedCourse = course;
  }

  courses = COURSES;

  constructor() {}

  ngOnInit(): void {}
}
